;(function (application, BB) {
    application.routes.NavysRoutes = BB.Router.extend({
        routes: {
            '': 'dashboard',
            ':entity': 'grid',
            ':entity/:action': 'editor',
            ':entity/:action/:id': 'editor'
        },
        initialize: function () {
            this.layout = new application.views.LayoutView({
                el: 'main'
            });
            this.layout.render();
        },
        dashboard: function () {
            var collections = {}, deffereds = [];
            _.each(APP.collections, function (collection_class, index) {
                collections[index] = new collection_class();
            });
            _.each(collections, function (collection) {
                deffereds.push(collection.fetch({reset: true, data: {limit: 8}}).promise());
            });
            $.when.apply(null, deffereds).done(function () {
                this.layout.setContentView(new application.views.DashboardView({collections: collections}));
            }.bind(this));
        },
        setId: function (entity, collection) {
            collection.each(function (model) {
                var options = {};
                if (entity === 'hotels') {
                    options.rating = (model.get('stars').search('✰') - 1) || 0;
                }
            });
        },
        grid: function (entity) {

            var limit = 10;

            var collection = new APP.collections[entity];
            collection.fetch({data: {limit: limit}});

            this.layout.setContentView(new application.views.GridView({
                collection: collection
            }, entity, limit));

        },
        editor: function (entity, action, id) {
            var model = new APP.models[entity]();
            model.set(model.idAttribute, id);
            action === 'edit' ? model.fetch() : '';
            this.layout.setContentView(new application.views.EditorView({model: model}, entity));
        }
    });
}(APP, Backbone));