class Main{
    public static void main(String[] args){
 int num[] = {40,50,60,70,80};
    int i, value = 80, pos = 0 ;
 
    for(i=0;i<=num.length;i++){
        if(value==num[i])
        {
            pos=i+1;
            break;
        }
    }
    
    
      if(value==num[i])
        {
            System.out.println("The value is found at "+pos);
         
        }
        else {
               System.out.println("Number not found");
        } 
    }
}
    
