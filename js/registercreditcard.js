document.getElementById('card_number').addEventListener('input', function () {
            // Only allows user to enter numbers into the card number input box
            var cardNumber = this.value.replace(/\D/g, '');

            // ads a '-' to users inputted card number after every 4 numbers
            if (cardNumber.length > 0) {
                cardNumber = cardNumber.match(/.{1,4}/g).join('-');
            }

            // returns formatted cardnumber
            this.value = cardNumber;
        });
        
        function opencard(){
            document.getElementById("new-credit-card").style.display = "none";
        }

        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            
            var content = this.nextElementSibling;
            if (content.style.display === "flex") {
            content.style.display = "none";
            } else {
            content.style.display = "flex";
            }
        });
        }