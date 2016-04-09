
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
        step: function(state, bar) {
            bar.setText((bar.value() * 100).toFixed(0) + '%');
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
            bar.setText((bar.value() * 100).toFixed(0) + 'm');
        }
    });

    conversion_2.animate(0.245);



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


});