APP.views.GridView = Backbone.View.extend({
    initialize: function (options, entity, limit) {
        this.entity = entity;
        this.limit = limit || 10;
        this.page = 1;
        this.collection.on('sync', this.onCollectionLoad.bind(this));
        this.template = _.template($('#grid-tpl').html());
    },
    onCollectionLoad: function(view, items, options)
    {
        this.total = options.xhr.getResponseHeader('X-Api-Total');
        this.render();
    },
    render: function () {
        this.$el.html(this.template({
            collection: this.collection.toJSON(),
            entity: this.entity,
            limit: this.limit,
            page: this.page,
            total: this.total
        }));
        return this;
    },
    events: {
        "click button.delete": "destroy",
        'click [data-page]': 'onPage'
    },
    destroy: function (event) {
        if (confirm("Подтвердить удаление")) {
            var target = event.currentTarget,
                foundModel,
                entity,
                id,
                i= {};

            entity = 'id_' + target.getAttribute('data-entity');
            id = target.getAttribute('data-item');

            i[entity] = id;

            foundModel = this.collection.find(i);
            console.log(i);
            foundModel.destroy();
            this.collection.fetch({data: {limit: this.limit, offset: this.limit * this.page - this.limit}});
        } else {
            $('.alert').addClass('alert-success').text('Удаление отменено!');
            setTimeout(function () {
                $('.alert').removeClass('alert-success');
            }, 1500);
        }
    },

    onPage: function(event)
    {
        event && event.preventDefault();

        this.page = $(event.currentTarget).data('page');
        this.collection.fetch({data: {limit: this.limit, offset: this.limit * this.page - this.limit}});
    }
});




