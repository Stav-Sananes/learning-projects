<template>
    <div id="right">
        <h1>Development Crm</h1>
        <div class="horizontal">
            <img src="../images/horizontal.png" />
        </div>

        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s
        </p>

        <div class="users-icon"><img src="../images/users.png" /></div>

        <div class="tasks">
            <div class="add-tasks">
                <h2>Today's Task</h2>
                <div class="add-action">
                    <img src="../images/add.png" />
                </div>
            </div>

            <ul class="tasks-list">
                <li v-for="task in todayTask" v-bind:key="task.id">
                    <div class="info">
                        <div class="left">
                            <label class="myCheckbox">
                                <input
                                    type="checkbox"
                                    name="test"
                                    :checked="task.completed"
                                    @change="updateTodayTask(task.task_id)"
                                />
                                <span></span>
                            </label>

                            <h4>{{ task.title }}</h4>
                        </div>
                        <div class="right">
                            <img src="../images/edit.png" />
                            <img
                                src="../images/del.png"
                                @click="deleteTask(task.task_id)"
                            />

                            <button
                                v-bind:class="{
                                    inprogress: !task.approved,
                                    approved: task.approved,
                                }"
                            >
                                {{ task.approved ? "Approved" : "In progress" }}
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="upcoming">
                <div class="add-tasks">
                    <h2>Upcoming</h2>
                    <div class="add-action">
                        <img src="../images/add.png" alt="" />
                    </div>
                    <form action="" @submit="addUpcomingTask">
                        <input type="text" v-model="newTask" />
                    </form>
                    <ul class="task-list">
                        <li
                            v-for="upcomingtask in upcoming"
                            v-bind:key="upcomingtask.task_id"
                        >
                            <div class="info">
                                <div class="left">
                                    <label class="myCheckbox">
                                        <input
                                            type="checkbox"
                                            name="test"
                                            :checked="upcomingtask.completed"
                                            @change="
                                                checkUpcoming(
                                                    upcomingtask.task_id
                                                )
                                            "
                                        />
                                        <span></span>
                                    </label>
                                    <h4>{{ upcomingtask.title }}</h4>
                                </div>
                                <div class="right">
                                    <img src="../images/edit.png" alt="" />
                                    <img
                                        src="../images/del.png"
                                        alt=""
                                        @click="
                                            delUpcoming(upcomingtask.task_id)
                                        "
                                    />
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todayTask: [],
            upcoming: [],
            newTask: "",
        };
    },
    created() {
        this.fetchUpcoming();
        this.fetchTodayTask();
    },

    methods: {
        fetchUpcoming() {
            fetch("/api/upcoming")
                .then((res) => res.json)
                .then(({ data }) => {
                    this.upcoming = data;
                })
                .catch((err) => console.log(err));
        },
        addUpcomingTask(s) {
            s.preventDefault();
            if (this.upcoming.length > 4) {
                alert("Please Complete the task");
            } else {
                const newTask = {
                    title: this.newTask,
                    waiting: true,
                    task_id: Math.random().toString(36).substring(7),
                };
                fetch("/api/upcoming", {
                    method: "POST",
                    header: {
                        "content-type": "application/json",
                    },
                    body: JSON.stringify(newTask),
                }).then(() => this.upcoming.push(newTask));
                this.newTask = "";
            }
        },
        delUpcoming(task_id) {
            if (confirm("Are you sure??")) {
                fetch(`/api/upcoming/${task_id}`, {
                    method: "delete",
                })
                    .then((res) => res.json())
                    .then((data) => {
                        this.upcoming = this.upcoming.filter(
                            ({ task_id: id }) => id !== task_id
                        );
                    })
                    .catch((err) => console.log(err));
            }
        },
        checkUpcoming(task_id) {
            if (this.todayTask.length > 4) {
                alert("Sorry Complete existing task");
                window.location.href = "/";
            } else {
                this.addDailyTask(task_id);
                fetch(`/api/upcoming/${task_id}`, { method: "delete" }).then(
                    () => {
                        this.upcoming = this.upcoming.filter(
                            ({ task_id: id }) => id !== task_id
                        );
                    }
                );
            }
        },
        addDailyTask(task_id) {
            const task = this.upcoming.filter(
                ({ task_id: id }) => id == task_id
            )[0];

            fetch("/api/dailytask", {
                method: "POST",
                header: {
                    "content-type": "application/json",
                },
                body: JSON.stringify(task),
            })
                .then(() => this.todayTask.unshift(task))
                .catch((err) => console.log(err));
        },
        fetchTodayTask() {
            fetch("/api/dailtask")
                .then((res) => res.json())
                .then(({ data }) => (this.todayTask = data))
                .catch((err) => console.log(err));
        },
        deleteTask(task_id) {
            if (confirm("Are you sure?")) {
                fetch(`/api/dailytask/${task_id}`, {
                    method: "delete",
                })
                    .then((res) => res.json())
                    .then(
                        () =>
                            (this.todayTask = this.todayTask.filter(
                                ({ task_id: id }) => id !== task_id
                            ))
                    )

                    .catch((err) => console.log(err));
            }
        },
        updateTodayTask(task_id) {
            if (confirm("Task Completed?")) {
                fetch(`/api/dailytask/${task_id}`, { method: "delete" })
                    .then(() => {})
                    .then(() => {
                        this.todayTask = this.todayTask.filter(
                            ({ task_id: id }) => id !== task_id
                        );
                    })
                    .catch((err) => console.log(err));
            }
        },
    },
};
</script>

<style></style>
