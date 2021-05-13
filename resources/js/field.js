Nova.booting((Vue, router, store) => {
    Vue.component('index-file-manager-field', require('./components/Field/Index'))
    Vue.component('detail-file-manager-field', require('./components/Field/Detail'))
    Vue.component('form-file-manager-field', require('./components/Field/Form'))
})
