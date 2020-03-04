<template>
    <div class="col-md-8 mt-5">
        <div class="card">
            <div class="card-header">Task List</div>
                <div class="card-body">
                  <ul>
                    <li v-for="task in tasks" :key="task.id">{{task.title}}</li>
                  </ul>
                </div>
            </div>
        </div>
</template>

<script>
    export default{
        data() {
          return {
              tasks: []
          }
        },
        created(){
            axios.get('./api/task').then(response => this.tasks = response.data)
            Event.$on('taskCreated', (title) => {
                  this.tasks.push(title)
            });
        }
    }
</script>