APP.views.LayoutView = Backbone.View.extend({
    template: APP.JST["-layout"],
    render: function () {
        this.$el.html(this.template());
    },
    setContentView: function (view) {
        this.$('#content').html(view.render().$el);
    }
});