$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        stepsOrientation: "vertical",
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : '<i class="ni ni-curved-back flip-y" ></i>',
            next : '<i class="ni ni-curved-next"></i>',
            finish : '<i class="ni ni-send"></i>',
            current : ''
        },
    })
});
