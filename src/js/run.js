$(function () {
    $.getJSON('config/config.json', function (config) {
        APP.config = config;
        _.each(APP.config.entities, function (options, index) {
            var Model = Backbone.Model.extend({
                defaults: options.defaults,
                idAttribute: options.id,
                urlRoot: options.url,
                editor: options.editor
            });
            var Collection = Backbone.Collection.extend({
                model: Model,
                url: options.url
            });
            APP.models[index] = Model;
            APP.collections[index] = Collection;
        });
        new APP.routes.NavysRoutes();
        Backbone.history.start();
    });
});