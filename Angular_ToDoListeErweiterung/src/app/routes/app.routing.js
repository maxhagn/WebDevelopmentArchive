"use strict";
var router_1 = require("@angular/router");
var todo_component_1 = require('../components/todo/todo.component');
var about_component_1 = require('../components/about/about.component');
var edit_component_1 = require('../components/edit/edit.component');
var appRoutes = [
    {
        path: '',
        component: todo_component_1.ToDoComponent
    },
    {
        path: 'about',
        component: about_component_1.AboutComponent
    },
    {
        path: 'edit',
        component: edit_component_1.EditComponent
    }
];
exports.routing = router_1.RouterModule.forRoot(appRoutes);
//# sourceMappingURL=app.routing.js.map