<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<script>
    document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const quantityInput = document.getElementById('quantity_' + this.value);
            if (this.checked) {
                quantityInput.removeAttribute('disabled');
            } else {
                quantityInput.setAttribute('disabled', 'true');
            }
        });
    });
</script>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();

    const backToTopButton = document.getElementById('backToTop');

    window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopButton.style.display = "block";
        } else {
            backToTopButton.style.display = "none";
        }
    };

    // Scroll back to top when clicked
    backToTopButton.addEventListener('click', function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
</script>

<script>
    const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

    allSideMenu.forEach(item => {
        const li = item.parentElement;

        item.addEventListener('click', function() {
            allSideMenu.forEach(i => {
                i.parentElement.classList.remove('active');
            })
            li.classList.add('active');
        })
    });

    // TOGGLE SIDEBAR
    const menuBar = document.querySelector('#content nav .bx.bx-menu');
    const sidebar = document.getElementById('sidebar');

    menuBar.addEventListener('click', function() {
        sidebar.classList.toggle('hide');
    })

    const searchButton = document.querySelector('#content nav form .form-input button');
    const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
    const searchForm = document.querySelector('#content nav form');

    searchButton.addEventListener('click', function(e) {
        if (window.innerWidth < 576) {
            e.preventDefault();
            searchForm.classList.toggle('show');
            if (searchForm.classList.contains('show')) {
                searchButtonIcon.classList.replace('bx-search', 'bx-x');
            } else {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
            }
        }
    })

    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');
    } else if (window.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }

    window.addEventListener('resize', function() {
        if (this.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }
    })

    const switchMode = document.getElementById('switch-mode');

    switchMode.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('dark');
        } else {
            document.body.classList.remove('dark');
        }
    })
</script>


<script>
    // Get modal element
    var modal = document.getElementById('editProductModal');

    // Get the edit button and close button
    var editBtns = document.querySelectorAll('.edit-btn');
    var closeBtn = document.querySelector('.close-btn');

    // Show modal when edit button is clicked
    editBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            modal.style.display = 'block';
        });
    });

    // Close modal when the close button is clicked
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Close modal if the user clicks outside the modal
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
</script>

<script>
    function changeMainImage(subImage) {
        // Get the main image element
        var mainImage = document.getElementById("mainImage");

        // Update the main image's src attribute to the clicked sub image's src
        mainImage.src = subImage.src;
    }
</script>


<script>
    function increaseQuantity() {
        var quantityInput = $('#quantity-input');
        var currentValue = parseInt(quantityInput.val());
        quantityInput.val(currentValue + 1); // Increase value by 1
    }

    function decreaseQuantity() {
        var quantityInput = $('#quantity-input');
        var currentValue = parseInt(quantityInput.val());
        if (currentValue > 1) {
            quantityInput.val(currentValue - 1); // Decrease value by 1, but not below 1
        }
    }
</script>
<script>
    function showFeedbackForm() {
        document.getElementById('feedbackForm').style.display = 'block';
        document.getElementById('feedbackForm2').style.display = 'none';
    }

    function showFeedbackForm2() {
        document.getElementById('feedbackForm').style.display = 'none';
        document.getElementById('feedbackForm2').style.display = 'block';
    }

    function showSpecificProblemSection1() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection1').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection2() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection2').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection3() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection3').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection4() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection4').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection5() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection5').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection6() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection6').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection7() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection7').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection8() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection8').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection9() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection9').style.display = showSection ? 'block' : 'none';
    }

    function showSpecificProblemSection10() {
        const checkboxes = document.querySelectorAll('input[name="problem"]');
        let showSection = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                showSection = true;
            }
        });

        // Show or hide the specific problem section based on checkbox state
        document.getElementById('specificProblemSection10').style.display = showSection ? 'block' : 'none';
    }
</script>


@stack('js')
