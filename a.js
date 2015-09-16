(function(){
var score = prompt("请输入成绩，用逗号分开","")
  if (score != null && score != "")
    {
     var result = score.split(',');
         if (result.length != '4'){
            document.write('Fail');
            var total = 0;
          }
        else {
          var total = parseInt(result['0'],"10")+parseInt(result['1'],"10")+parseInt(result['2'],"10")+parseInt(result['3'],"10")
          console.log(total);
        }
        if (total > '310' ) {
               if(result['0'] >= '60' && result['1'] >='60' && result['2'] >='90' && result['3'] >='90' && total < '349'){
               document.write('Zifei');
               }
         }
          else if(total > '350' && result['0'] >= '60' && result['1'] >='60' && result['2'] >='90' && result['3'] >='90') {
                document.write('Gongfei');
          }
          else if (result.length != '4'){
                document.write('Fail');
          }
          else {
                document.write('Fail');
          }
         
    }

})()
