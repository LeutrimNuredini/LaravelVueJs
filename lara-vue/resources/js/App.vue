<template>
    <div>
        <nav
            class="navbar navbar-expand-md"
            style="background-color:#2196f3; height: 60px"
        >
            <div class="container">
                <router-link to="/" class="nav-item nav-link">
                    <h1 class="navbar-nav text-white">MerrJep</h1>
                </router-link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav">
                    <router-link
                        to="/"
                        class="nav-item nav-link mt-2 mr-3 text-white"
                    >
                        <h4>Home</h4>
                    </router-link>
                    <router-link
                        to="/createpost"
                        class="nav-item nav-link mt-2 mr-3 text-white"
                    >
                        <h4>Create Post</h4>
                    </router-link>
                    <router-link
                        to="/about"
                        class="nav-item nav-link mt-2 text-white"
                    >
                        <h4>About</h4>
                    </router-link>
                </div>
            </div>
        </nav>

        <router-view></router-view>

        <div class="footer">
            <h1>MerrJep</h1>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 120px;
    background-color: rgba(0, 0, 0, 0.9);
}
</style>
