APP.views.EditorView = Backbone.View.extend({
    tagName: 'ol',
    className: "GridString",
    initialize: function (options, entity) {
        this.entity = entity;
        this.template = _.template($('#editor-tpl').html());
        this.model.on('sync', this.render.bind(this));
    },
    render: function () {
        var id;
        if (this.entity === 'hotels' && this.model.get('stars')) {
            this.model.set('rating', this.model.get('stars').search('✰') || 0, {silent: true});
        }
        this.$el.html(this.template({
            model: this.model.toJSON(),
            entity: this.entity
        }));
        this.$('input[value=' + this.model.get('stars') + ']').attr('checked', 'checked');
        return this;
    },
    events: {
        "submit form": "save"
    },
    save: function (event) {
        event.preventDefault();
        var file = [];
        var fd = new FormData();
        var $form_data = $('form [name]');
        $form_data.each(function (index, elem) {
            if ($(elem).attr('type') === 'file') {
                fd.append($(elem).attr('name'), $(elem)[0].files[0]);
            } else if ($(elem).attr('name') === 'stars') {
                if ($(elem).is(':checked')) {
                    fd.append($(elem).attr('name'), $(elem).val());
                }
            } else {
                fd.append($(elem).attr('name'), $(elem).val());
            }
        });
        var url = this.model.urlRoot + (!this.model.isNew() ? '/' + this.model.id : '');
        var type = this.model.isNew() ? 'POST' : 'PUT';
        $.ajax({
            type: type,
            url: url + '?file_field_name=' + APP.config.entities[this.entity].file_field_name,
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                $(this).html(response);
                jQuery('#redactor')[0].reset();
                $('.alert').addClass('alert-success').text('Сохранение успешно!');
                setTimeout(function () {
                    $('.alert').removeClass('alert-success');
                }, 1500);
            }
        });
    }
});


