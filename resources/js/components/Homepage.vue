<template>
    <div class="container">
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-1"></div>
            <div class="col-md-6 welcome-title">Booksource</div>
        </div>
        <div class="row">  </div>
        <div class="row">  </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="button-row col-md-3">
                <div class="buttons">
                    <button type="button" class="btn btn-success btn-lg">
                        <router-link :to="{ name: 'datasource' }">Show Data
                        </router-link>
                    </button>
                    <button type="button" class="btn btn-success btn-lg">
                        <router-link :to="{ name: 'datasource' }">Add Data
                        </router-link>
                    </button>
                    
                <!-- <button type="button" class="btn btn-success btn-lg" onclick="window.location='{{ route('booksource.insert') }}'">{{insertButton}}</button> -->
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
.welcome-title {
    text-align: center;
    font-size: 50px;
}
a {
    color: white;
    text-decoration: none;
    background-color: transparent;
}
.welcome-title[data-v-7f033e59] {
    text-align: center;
    /* font-size: 100px; */
    color: #A9A9A9;
    font-family: 'Open Sans', sans-serif;
    font-size: 70px;
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1.1;
    margin-top: 15%;
}
@media only screen and (max-width: 800px) {
    .welcome-title {
        font-size: 45px;
    }
}

.button-row.col-md-3 {
    margin: 40px!important;
}


    .buttons {
        margin-left: auto;
        margin-right: auto;
    }
</style>
