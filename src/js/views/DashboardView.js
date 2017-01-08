APP.views.DashboardView = Backbone.View.extend({
    tagName: 'ol',
    className: 'GridString',
    initialize: function (options) {
        console.log(this);
        this.collections = options.collections || [];
        this.template = _.template($('#dashboard-tpl').html());
    },
    render: function () {
        var collections = {};
        _.each(this.collections, function (collection, index) {
            collections[index] = collection.toJSON();
        }.bind(this));
        console.log(collections);
        this.$el.html(this.template({
            collection: collections
        }));
        return this;
    },
    events: {
        "click button.delete": "destroy"
    },
    destroy: function (event) {
        if (confirm("Подтвердить удаление")) {
            var target = event.currentTarget;
            var test = this.collections[target.getAttribute('data-entity')]
                .get(target.getAttribute('data-item'))
            this.render();
        } else {
            alert("Удаление отменено")
        }
    }
});



