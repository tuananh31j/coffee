export default {

    prefix: 'tw-',
    theme: {
        extend: {
            colors: {
                primary: '#FF5F17',
            },
            animation: {
                move: 'move 0.6s linear',
            },
            keyframes: {
                move: {
                    from: { opacity: '0' },
                    to: { opacity: '1' },
                },
            },
        },
    },
    plugins: [],
};