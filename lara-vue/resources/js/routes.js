import Home from './components/HomeComponent.vue';
import CreatePost from './components/CreatePostComponent.vue';

export const routes = [{
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        name: 'createpost',
        path: '/createpost',
        component: CreatePost
    }

]
