"use strict";
var router_1 = require("@angular/router");
var bug_component_1 = require('../components/bug/bug.component');
var about_component_1 = require('../components/about/about.component');
var appRoutes = [
    {
        path: '',
        component: about_component_1.AboutComponent
    },
    {
        path: 'app',
        component: bug_component_1.BugComponent
    }
];
exports.routing = router_1.RouterModule.forRoot(appRoutes);
//# sourceMappingURL=app.routing.js.map