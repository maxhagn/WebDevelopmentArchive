(function() {
    angular.module('blog', [])
        .controller('BlogController', BlogController)
        .service('EntryService', EntryService)
        .filter('paginationDisplay', paginationDisplay);

    function BlogController(EntryService) {
        var vm = this;

        var PAGINATION_LIMIT = 5;

        vm.state = {
            newEntry: false,
            pagination: null
        };

        vm.entries = [];

        vm.entryForm = null;
        vm.formFields = {};

        vm.addEntry = addEntry;
        vm.saveEntry = saveEntry;
        vm.discardEntry = discardEntry;
        vm.toNextPage = toNextPage;
        vm.toPreviousPage = toPreviousPage;
        vm.getCreationDate = getCreationDate;

        vm.hasNextPage = EntryService.hasNext;
        vm.hasPreviousPage = EntryService.hasPrevious;
        vm.getPagination = EntryService.getPagination;

        init();

        function init() {
            EntryService.next().then(updateEntries);
        }

        function updateEntries(entries) {
            vm.entries = entries;
        }

        function addEntry() {
            vm.state.newEntry = true;
        }

        function saveEntry() {
            var entry = angular.copy(vm.formFields);
            EntryService.create(entry).then(function() {
                vm.entries.splice(0, 1);
                entry.created_at = +Date.now();
                vm.entries.unshift(entry);
                vm.state.newEntry = false;
                cleanForm();
            });
        }

        function discardEntry() {
            vm.state.newEntry = false;
            cleanForm();
        }

        function cleanForm() {
            vm.formFields = {};
            vm.entryForm.$setPristine();
        }

        function toNextPage() {
            EntryService.next().then(updateEntries);
        }

        function toPreviousPage() {
            EntryService.previous().then(updateEntries);
        }

        function getCreationDate(entry) {
            return new Date(entry.created_at);
        }
    }

    function EntryService($http, $q) {
        var service = this;

        var ENDPOINT = '/eintraege';

        var pagination = null;

        service.next = next;
        service.hasNext = hasNext;
        service.previous = previous;
        service.hasPrevious = hasPrevious;
        service.create = create;
        service.getPagination = getPagination;

        function fetch(url) {
            url = url || ENDPOINT;
            return $http.get(url).then(updatePagination);
        }

        function updatePagination(response) {
            pagination = response.data;
            var promise = $q.defer();
            promise.resolve(response.data.data);
            return promise.promise;
        }

        function next() {
            return fetch(pagination && pagination.next_page_url);
        }

        function hasNext() {
            return !!pagination && !!pagination.next_page_url;
        }

        function previous() {
            return fetch(pagination.prev_page_url);
        }

        function hasPrevious() {
            return !!pagination && !!pagination.prev_page_url;
        }

        function create(entry) {
            return $http.post('/eintraege', entry);
        }

        function getPagination() {
            return pagination;
        }
    }

    function paginationDisplay() {
        return function(pagination) {
            if (!pagination) {
                return "Bitte warten...";
            }
            var from = pagination.from;
            var to = pagination.to;
            var total = pagination.total;
            return from + " bis " + to + " von " + total;
        }
    }
})();