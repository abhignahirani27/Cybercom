
        var Mark={
            name:'Mark Cage',
            mass:30,
            height:3,
            calculateBMI:function(){
                this.BMI=this.mass/(this.height*this.height);
            }
        };
           Mark.calculateBMI();
           console.log(Mark); 

        var John={
            name:'John Smith',
            mass:50,
            height:4,
            calculateBMI:function(){
                this.BMI=this.mass/(this.height*this.height);
            }
        };
           John.calculateBMI();
           console.log(John); 

           if(Mark.BMI>John.BMI)
           {
               console.log(Mark.name + " has the highest BMI with " + Mark.BMI);
           }
           else if(John.BMI>Mark.BMI)
           {
               console.log(John.name + " has the highest BMI with " + Mark.BMI);
           }
           else{
               console.log(Mark.name + " and " + John.name + " has the same BMI");
           }