new Vue({
    el: '#app',
    data: {
        product: [],
        search: '',
        viewItem: [],
    },
    mounted() {
        this.getAll();
    },
    methods: {
        getAll() {
            axios.get('/tasks/select').then(response => this.product = response.data)
                .catch((error) => console.log(error.response.data));
        },
        sortLowest() {
            this.product.sort((a, b) => a.price > b.price ? 1 : -1);
        },
        sortHighest() {
            this.product.sort((a, b) => a.price < b.price ? 1 : -1);
        },
        viewSelected(id) {
            $('#modal-lg-view').modal('toggle');
            axios.get('/tasks/view?id=' + id).then(response => this.viewItem = response.data)
                .catch((error) => console.log(error.response.data));
        }
    },
    computed: {
        searcheForm() {
            let filter = new RegExp(this.search, 'i')
            return this.product.filter(el => el.name.match(filter))
        },
    },
});