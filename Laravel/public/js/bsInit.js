$(document).ready(function () {
    pop = $('[data-bs-toggle="popover"]').popover({ 
      html:true,
    });

  //tooltips init
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip",data-bs-toggle="deltooltip"]')

    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    //Modal init
    const myModal = document.getElementById('cartModal')
    const modalInput = document.getElementById('modalInput')

  myModal.addEventListener('shown.bs.modal', () => {
    modalInput.focus()
})


  });
  