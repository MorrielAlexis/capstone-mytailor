
      $('.validateComName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-\s\,\.]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateComName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-\s\,\.]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });      

      //Kapag whitespace
      $('.validateComName').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      $('.validateConPerson').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-\s]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateConPerson').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z\'\-\s]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateConPerson').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 
//////////////////////////////////////////////
      $('.validateFirst').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateFirst').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });      

      //Kapag whitespace
      $('.validateFirst').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      $('.validateMiddle').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateMiddle').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      $('.validateLast').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateLast').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z\'\-]+( [a-zA-Z\'\-]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateLast').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 
//////////////////////////////////////////////
      $('.validateHouseNo').on('input', function() {
        var input=$(this);
        var re=/[0-9a-zA-Z\-\s]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateHouseNo').blur('input', function() {
        var input=$(this);
        var re=/[0-9a-zA-Z\-\s]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateHouseNo').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      $('.validateZip').on('input', function() {
        var input=$(this);
        var re=/^[0-9]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateZip').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 
/////////////////////////////////////////
      //Validate Blank
      $('.validateStreet').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateStreet').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      //Kapag whitespace
      $('.validateStreet').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      //Validate Blank
      $('.validateBarangay').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateBarangay').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      //Validate Blank
      $('.validateCity').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Validate Blank
      $('.validateCity').blur('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

       //Kapag whitespace
      $('.validateCity').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      //Validate Blank
      $('.validateProvince').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9\'\-\.]+( [a-zA-Z0-9\'\-\.]+)*$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag whitespace
      $('.validateProvince').blur('input', function() {
        var name = $(this).val();
        $(this).val(name.trim());
      }); 

      //Validate Numbers
      $('.validateAge').on('input', function() {
        var input=$(this);
        var re = /^[0-9]/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateAge').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

      $('.validateCell').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCell').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      });

      $('.validateCellAlt').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCellAlt').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      });

      //Validate Blank
      $('.validateCell').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

       $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));  
      });

       $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      }); 


      $('.validateEmail').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
//////////////////////////////////////////////////////////////////
      $('.validateFax').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

       $('.validateFax').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{2})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      }); 

