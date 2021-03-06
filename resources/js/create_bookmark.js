var BookmarkFound = Backbone.Model.extend({
    defaults: function() {
        return {
            id: 0,
            name: "empty name...",
            description: "empty description..."
        }
    },

    getId: function() {
        return this.id;
    }
});

var BookmarkFoundList = Backbone.Collection.extend({
    model: BookmarkFound,
    url: '/favourite/searchJson'
});

var BookmarkFounds = new BookmarkFoundList;

var BookmarkFoundView = Backbone.View.extend({
    tagName: "div",

    template: _.template($('#bookmarkfound-template').html()),

    events: {
        "click #plock-fav": "onPlockFavourite"
    },

    initialize: function() {
        this.listenTo(this.model, 'change', this.render);
    },

    render: function() {
        console.log(this.model.toJSON());
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    },

    onPlockFavourite: function(e) {
        $.post("/bookmark/create", {
            favourite_id: this.model.attributes.id,
            review: " ",
            type: "movies",
            name: "this.model.attributes.short_description.name"
        }, function (data) {
            window.location = "/news";
        });
    }
});

var BookmarkFoundsView = Backbone.View.extend({
    el: $("#found-app"),

    initialize: function() {
        this.listenTo(BookmarkFounds, 'all', this.addAll);
    },

    addOne: function(found) {
        var view = new BookmarkFoundView({model: found});
        this.$("#found-list").append(view.render().el);
    },

    addAll: function() {
        this.$("#found-list").html('');
        BookmarkFounds.each(this.addOne, this);
    },

    fetch: function(options, callback) {
        BookmarkFounds.fetch({
            data: options,
            method: 'GET',
            success: callback
        });
    }
});

var BookmarkSearch = new BookmarkFoundsView;
