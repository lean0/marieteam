function notifyBateau() {
    $(document).ready(function () {

        demo.initChartist();

        $.notify({
            icon: 'pe-7s-gift',
            message: "Bienvenue <b>Panel Administration de MarieTeam</b>"

        }, {
            type: 'info',
            timer: 4000
        });

    });
}