$(document).ready(function () {
  // popovers init (unused), remains incase I find an easy way to use it with blade. 
    $('[data-bs-toggle="popover"]').popover({
      html:true
    });

  //tooltips init
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    //Modal init
    const myModal = document.getElementById('cartModal')
    const modalInput = document.getElementById('modalInput')

  myModal.addEventListener('shown.bs.modal', () => {
    modalInput.focus()
})


  });
  