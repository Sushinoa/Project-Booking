<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.12.2016
 * Time: 19:50
 */

namespace App\Components;

class FormData
{
    /**
     * @var array
     */
    protected $request = [];

    /**
     * @var array
     */
    protected $files = [];

    /**
     * @param string $raw
     */
    public function __construct($raw)
    {
        if (!preg_match('/boundary=(.*)$/', $_SERVER['CONTENT_TYPE'], $matches)) {
            return;
        }

        $boundary = $matches[1];

        if (!count($boundary)) {
            parse_str(urldecode($raw), $this->request);
            return;
        }

        $blocks = preg_split("/-+$boundary/", $raw);
        array_pop($blocks);

        $results = array(
            'post' => array(),
            'file' => array()
        );

        foreach ($blocks as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $block = $this->decide($value);

            if (count($block['post']) > 0) {
                array_push($results['post'], $block['post']);
            }

            if (count($block['file']) > 0) {
                array_push($results['file'], $block['file']);
            }
        }

        $this->merge($results);
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }

    private function decide($string)
    {
        if (strpos($string, 'application/octet-stream') !== false) {
            preg_match('/name=\"([^\"]*)\".*stream[\n|\r]+([^\n\r].*)?$/s', $string, $match);
            return array(
                'post' => array($match[1] => $match[2]),
                'file' => array()
            );
        }

        if (strpos($string, 'filename') !== false) {
            return array(
                'post' => array(),
                'file' => $this->file($string)
            );
        }

        return array(
            'post' => $this->post($string),
            'file' => array()
        );
    }

    private function file($string)
    {
        $data = array();

        list($headers, $body) = explode("\r\n\r\n", $string);

        $headers = explode("\r\n", trim($headers));

        $tmp = [];
        foreach ($headers as $header) {
            list($key, $value) = explode(':', $header, 2);
            $tmp[$key] = $value;
        }

        $headers = array_map(function($value){
            return trim($value);
        }, $tmp);

        preg_match('/name=\"([^\"]*)\"; filename=\"([^\"]*)\"/', $headers['Content-Disposition'], $matches);

        $path = sys_get_temp_dir().'\php'.substr(sha1(rand()), 0, 6);
        $err = file_put_contents($path, $body);

        if (preg_match('/^(.*)\[\]$/i', $matches[1], $tmp)) {
            $index = $tmp[1];
        } else {
            $index = $matches[1];
        }

        $data[$index]['name'][] = $matches[2];
        $data[$index]['type'][] = $headers['Content-Type'];
        $data[$index]['tmp_name'][] = $path;
        $data[$index]['error'][] = ($err === FALSE) ? $err : 0;
        $data[$index]['size'][] = filesize($path);

        return $data;
    }

    private function post($string)
    {
        $data = array();

        preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $string, $match);

        if (preg_match('/^(.*)\[\]$/i', $match[1], $tmp)) {
            $data[$tmp[1]][] = $match[2];
        } else {
            $data[$match[1]] = $match[2];
        }

        return $data;
    }

    private function merge($array)
    {
        $results = array(
            'post' => array(),
            'file' => array()
        );

        if (count($array['post']) > 0) {
            foreach($array['post'] as $key => $value) {
                foreach($value as $k => $v) {
                    if (is_array($v)) {
                        foreach($v as $kk => $vv) {
                            if (!array_key_exists($kk, $results['file']) || !is_array($results['post'][$kk])) {
                                $results['post'][$kk] = [];
                            }

                            $results['post'][$k][] = $vv;
                        }
                    } else {
                        $results['post'][$k] = $v;
                    }
                }
            }
        }
        if (count($array['file']) > 0) {
            foreach($array['file'] as $key => $value) {
                foreach($value as $k => $v) {
                    if (is_array($v)) {
                        foreach($v as $kk => $vv) {
                            if (!array_key_exists($k, $results['file']) || !is_array($results['file'][$k])) {
                                $results['file'][$k] = [];
                            }

                            $results['file'][$k][$kk] = @$vv[0];
                        }
                    } else {
                        $results['file'][$key] = $v;
                    }
                }
            }
        }

        $this->request = $results['post'];
        $this->files   = $results['file'];
    }
}