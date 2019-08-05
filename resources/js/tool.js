Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'file-manager',
            path: '/file-manager',
            component: require('./components/Tool'),
        },
    ])
})
