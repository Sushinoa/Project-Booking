<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04.11.2016
 * Time: 14:16
 */

namespace App\Controller;

use App\Components\FormData;
use App\Model\Appartment;
use App\Model\AppartmentAttachment;
use App\Model\Hotel;
use App\Model\HotelAttachment;
use App\Model\Request;
use App\Model\User;

class ApiController
{
    /**
     *@param ParentModel=[]
     */
    protected $models = [];

    /**
     * ApiController constructor.
     * @param array $models
     */
    public function __construct()
    {
        $this->models = [
            'users'                 => new User(),
            'hotels'                => new Hotel(),
            'apartments'            => new Appartment(),
            'requests'              => new Request(),
            'appartmentAttachments' => new AppartmentAttachment(),
            'hotelAttachments'      => new HotelAttachment()
        ];
    }


    public function actionMethod($entity, $id)
    {
        if (!array_key_exists($entity, $this->models)) {
            throw new \Exception('Entity is not defined');
        }


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                $this->getId($entity, $id);
            } else {
                $this->getList($entity);
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $array = array();

            unset($_REQUEST['file_field_name']);
            $data = array_merge($_REQUEST, $array);
            $data += ['entity' => $entity];


            $filename = $_GET['file_field_name'];
            if ($filename === 'undefined') {
                $this->Add($data);

            } else {
                $nameFile = @$_FILES[$filename]['name'];
                $tmp_nameFile = @$_FILES[$filename]['tmp_name'];
                $uploaddir = 'upload/';
                $pathFile = $uploaddir . $nameFile;
                move_uploaded_file($tmp_nameFile, $pathFile);
                $image = '/' . $pathFile;
                $data += [$filename => $image];
                $this->Add($data);
            }


        }
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {


            $filename = $_GET['file_field_name'];
            $formData = new FormData(file_get_contents('php://input'));
            $data = $formData->getRequest();
            $file = $formData->getFiles();
            $data += ['entity' => $entity];
            $model = $this->models[$entity];
            $dataEntity = $model->find($id);
            $imageOld = @$dataEntity[$filename];

            if ($filename === 'undefined') {
                $this->Update($data, $id);

            } else {
                if (array_key_exists($filename, $file)) {

                    $nameFile = $file[$filename]['name'];
                    $tmp_nameFile = $file[$filename]['tmp_name'];
                    $uploaddir = 'upload/';
                    $pathFile = $uploaddir . $nameFile;

                    rename($tmp_nameFile, $pathFile);

                    $image = '/' . $pathFile;

                    $data += [$filename => $image];

                } else {
                    echo $imageOld;
                    unset($data[$filename]);
                    $data += [$filename => $imageOld];

                }

            }

            $this->Update($data, $id);

        }
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->Delete($entity, $id);
        }

    }

    public function getList($entity)
    {
        header('Content-Type: application/json');

        $model = $this->models[$entity];

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : null;
        $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : null;
        $List = $model->findBy([], [], $limit, $offset);

        header('X-Api-Total: ' . (int)$model->countBy());

        echo json_encode($List);
    }


    public function getId($entity, $id)
    {
        header('Content-Type: application/json');
        $model = $this->models[$entity];
        $Item = $model->find($id);

        echo json_encode($Item);

    }

    public function Add($data)
    {

        $entity = $data['entity'];
        unset($data['entity']);
        $model     = $this->models[$entity];
        $save      = $model->create($data);
        $newNote   = $model->find($save);

        echo json_encode($newNote);
    }

    public function Update($data, $id)
    {
        $entity = $data['entity'];
        unset($data['entity']);
        $model   = $this->models[$entity];
        $newNote = $model->update($data,$id);

        echo json_encode($newNote);
    }

    public function Delete($entity, $id)
    {
        $model = $this->models[$entity];
        $model->remove($id);

    }
}