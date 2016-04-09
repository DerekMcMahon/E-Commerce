
$(document).ready(function () {

    var conversion_1 = new ProgressBar.Circle('#radial_1', {
        color: '#2ECC71',
        strokeWidth: 10,
        trailWidth: 10,
        duration: 1500,
        text: {
            value: '64%',
            className: 'label' 
        },
        from: { color: '#A2DED0' },
        to: { color: '#2ECC71' },
        step: function(state, bar) {
            bar.setText((bar.value() * 100).toFixed(0) + '%');
            bar.path.setAttribute('stroke', state.color);
        }
    });

    conversion_1.animate(0.64);



    var conversion_2 = new ProgressBar.Circle('#radial_2', {
        color: '#BE90D4',
        strokeWidth: 10,
        trailWidth: 10,
        duration: 1500,
        text: {
            value: '0',
            className: 'label' 
        },
        step: function(state, bar) {
            bar.setText((bar.value() * 60).toFixed(0) + 'm');
        }
    });

    conversion_2.animate(23/60);



    var conversion_3 = new ProgressBar.Circle('#radial_3', {
        color: '#5C97BF',
        strokeWidth: 10,
        trailWidth: 10,
        duration: 1500,
        easing: 'easeInOut',
        text: {
            value: '0',
            className: 'label' 
        },
        from: { color: '#67809F'},
        to: { color: '#5C97BF'},
        step: function(state, bar) {
            bar.setText((bar.value() * 100).toFixed(0) + '%');
            bar.path.setAttribute('stroke', state.color);
        }
    });

    conversion_3.animate(0.89);

    var progress = new ProgressBar.Line('#progress', {
        color: '#ABB7B7', 
        strokeWidth: 5,
        trailWidth: 5,
        duration: 1500,
        easing: 'easeInOut',
        text: {
            value: '0',
            className: 'label',
            style: {
                // Text color.
                // Default: same as stroke color (options.color)
                position: 'absolute',
                top: '50%',
                padding: 0,
                margin: 0,
                // You can specify styles which will be browser prefixed
                transform: {
                    prefix: true,
                }
            }
        },
        from: { color: '#ABB7B7' },
        to: { color: '#6BB9F0' },
        step: function(state, bar) {
            bar.setText((bar.value() * 100).toFixed(0) + '%');
            bar.path.setAttribute('stroke', state.color);
            bar.text.style.color = state.color;
        }
    });

    var cus = 1643000/3000000;
    progress.animate(cus);


});