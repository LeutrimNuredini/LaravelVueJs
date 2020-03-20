<template>
    <div class="container">
        <h2 class="mt-5">Create Your Post</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input
                type="text"
                class="form-control"
                placeholder="Title"
                v-model="title"
            />
        </div>
        <div>
            <label for="exampleInputEmail1">Upload Image</label>
        </div>
        <button class="btn btn-primary" @click="onPickFile">
            <i class="fa fa-image" style="font-size: 17px"></i> Upload Image
        </button>
        <input
            type="file"
            style="display: none"
            ref="fileInput"
            accept="image/*"
            @change="onImageChange"
            required
        />
        <v-layout row>
            <v-flex xs12 sm6 offset-sm3>
                <img :src="image" height="200" class="mt-4 ml-3" />
            </v-flex>
        </v-layout>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input
                type="text"
                class="form-control"
                placeholder="Description"
                v-model="description"
            />
        </div>
        <button class="btn btn-success" @click.prevent="uploadImage">
            Create Post
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: "",
            description: "",
            image: ""
        };
    },

    methods: {
        onPickFile() {
            this.$refs.fileInput.click();
        },

        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = e => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        uploadImage() {
            axios
                .post("api/image/store", {
                    image: this.image,
                    title: this.title,
                    description: this.description
                })
                .then(this.$router.push("/"));
        }
    }
};
</script>

<style></style>
