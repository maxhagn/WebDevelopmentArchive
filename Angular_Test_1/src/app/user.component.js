"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
Object.defineProperty(exports, "__esModule", { value: true });
var core_1 = require("@angular/core");
var posts_service_1 = require("./services/posts.service");
var UserComponent = (function () {
    function UserComponent(postsService) {
        this.postsService = postsService;
        this.nums = "";
        this.savedPin = "";
        this.closed = false;
        this.postsService.getPosts().subscribe(function (posts) {
            console.log(posts);
        });
    }
    UserComponent.prototype.printNum = function (arg) {
        if (this.nums.length < 6) {
            this.nums += arg.toString();
            if (this.closed) {
                if (this.nums == this.savedPin) {
                    this.closed = !(this.closed);
                    this.nums = "OPEN";
                }
            }
        }
    };
    UserComponent.prototype.triggerLock = function () {
        if (2 < (this.nums.length)) {
            if (!this.closed) {
                this.closed = true;
                this.savedPin = this.nums;
                this.nums = "CLOSED";
            }
            else {
                this.nums = "ENTER CORRECT PIN";
            }
        }
        else {
            this.nums = "ENTER CORRECT PIN";
        }
    };
    UserComponent.prototype.triggerClear = function () {
        this.nums = "";
    };
    UserComponent = __decorate([
        core_1.Component({
            selector: 'user',
            templateUrl: 'app/app.component.html',
            styleUrls: ['app/app.component.css'],
            providers: [posts_service_1.PostsService]
        }),
        __metadata("design:paramtypes", [posts_service_1.PostsService])
    ], UserComponent);
    return UserComponent;
}());
exports.UserComponent = UserComponent;
//# sourceMappingURL=user.component.js.map