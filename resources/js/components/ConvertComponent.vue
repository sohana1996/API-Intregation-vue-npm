<template>
    <div class="container">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><h2 class="text-center">Convert Timezone Create form</h2></div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="email">From Time Zone:</label>
                        <input type="text" class="form-control" placeholder="Asia/Dhaka" v-model="convert.from_tz">
                    </div>
                    <div class="form-group">
                        <label for="email">Date Time:</label>
                        <input type="text" class="form-control" placeholder="America/Chicago" v-model="convert.to_tz">
                    </div>
                    <div class="form-group">
                        <label for="email">To Time Zone:</label>
                        <input type="text" class="form-control" placeholder="12-03-2020" v-model="convert.datetime">
                    </div>
                    <button type="button" class="btn btn-primary" @click="convertZone">Submit</button>
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-header"><h2 class="text-center">Convert Timezone Result : </h2></div>
                        <div class="card-body">
                            <h5>Convert From : </h5> <h6>{{viewConvert.from_tz}}</h6>
                            <h5>Convert To : </h5> <h6>{{viewConvert.to_tz}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'location',
        data() {
            return {
                convert: {
                    from_tz: null,
                    to_tz: null,
                    datetime: null,
                },

                viewConvert: [],
                message: null
            }
        },

        methods: {
            convertZone() {
                fetch('/api/convert', {
                    method: 'POST',
                    body: JSON.stringify(this.convert),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                })
                    .then(response => response.json())
                    .then(res => {
                            this.viewConvert = res.data;
                        }
                    )
            },
        }
    }
</script>
