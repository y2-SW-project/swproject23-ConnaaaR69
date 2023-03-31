$(document).ready(function () {
    pop = $('[data-bs-toggle="popover"]').popover({ 
      html:true,
    });

  //tooltips init
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')

    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

});

  