new Vue({
    el: '#app',
    data: {
        product: [],
        search: '',
        newProduct: {
            _csrf: yii.getCsrfToken(),
            id: '',
            name: '',
            price: '',
            desc: '',
            is_published: '',
        },
    },
    mounted() {
        this.getAll();
    },
    methods: {
        modalProduct() {
            $('#modal-lg').modal('toggle');
        },
        getAll() {
            axios.get('/admin/tasks/select').then(response => this.product = response.data)
                .catch((error) => console.log(error.response.data));
        },
        addProduct() {
            self = this;
            let productForm = this.newProduct;

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            axios.post('/admin/tasks/create', productForm).then(function (response) {
                if (response.data.success) {
                    $('#modal-lg').modal('toggle');
                    self.getAll();
                    Toast.fire({
                        type: 'success',
                        title: 'Ваше данный было добавлено в базу данных !!!'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Ошибка запольнете поля обезательно поле обязательное для заполнения !!!'
                    });
                }
            });

        },
        updateProduct(id) {
            let updateProductForm = this.newProduct;

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            axios.post('/admin/tasks/update?id=' + id, updateProductForm).then(function (response) {
                if (response.data.success) {
                    $('#modal-lg-update').modal('toggle');
                    self.getAll();
                    Toast.fire({
                        type: 'success',
                        title: 'Ваше данный было обновлено в базе данных !!!'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Ошибка запольнете поля обезательно поле обязательное для заполнения !!!'
                    });
                }
            });
        },
        editForm(id) {
            self = this;
            axios.get('/admin/tasks/edit?id=' + id).then(function (response) {
                $('#modal-lg-update').modal('toggle');
                self.newProduct.id = response.data.id;
                self.newProduct.name = response.data.name;
                self.newProduct.price = response.data.price;
                self.newProduct.desc = response.data.desc;
                self.newProduct.is_published = response.data.is_published;

            });
        },
    },
    computed: {
        searcheForm() {
            return this.product.filter(elem => {
                return elem.name.includes(this.search);
            });
        },
    },
});