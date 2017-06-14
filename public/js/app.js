Vue.component('todo-item', {
    data: function() {
        return {
            isChecked: this.todo.is_checked,
        }
    },
    methods: {
        checkTodo: function() {
            var request = {
                is_checked: this.isChecked,
                id: this.todo.id
            };

            this.$http.post('todo/' +  this.todo.id +  '/check', request);
        },
        deleteTodo: function() {
            var self = this;

            this.$http.post('todo/' +  this.todo.id +  '/delete').then(response => {
                self.$emit('remove');
            });
        },
        editTodo: function() {
            this.$set(this.todo, 'edit', true);
        },
        saveEdit: function() {
            var self = this;
            var request = {
                message: this.todo.message
            };

            this.$http.post('todo/' +  this.todo.id +  '/edit', request).then(response => {
                self.$set(self.todo, 'edit', false);
            });
        }
    },
    template: `
    <li class="list-group-item flex-column align-items-start" v-bind:class="{ 'list-group-item-success' : isChecked }">
        <label class="m-0" v-show="!todo.edit">
            <input type="checkbox" v-model="isChecked" v-on:click="checkTodo" class="mr-3" /> {{ todo.message }}
        </label>       
        <input type="text"
               v-model="todo.message"
               v-show="todo.edit"
               v-on:blur="saveEdit">
        <div class="ml-auto">
            <a href="#" class="btn fa fa-pencil p-0 pr-1" v-on:click="editTodo"></a>
            <a href="#" class="btn fa fa-trash p-0" v-on:click="deleteTodo"></a>
        </div>
    </li>`,
    props: ['todo'],
    http: {
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    }
});

var app = new Vue({
    data: {
        todo: '',
        todos: {}
    },
    mounted: function()
    {
        this.$http.get('todo').then(response => {
            this.todos = response.body;
        });
    },
    methods: {
        addTodo: function (event) {
            var self = this;
            var request = {
                message: event.target.value
            };

            this.$http.post('todo/create', request).then(response => {
                self.todos.push(response.body);
                self.todo = '';
            });
        }
    },
    http: {
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
    }
}).$mount('.app');