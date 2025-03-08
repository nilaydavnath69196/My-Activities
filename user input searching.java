class Main{
    public static void main(String[] args){
        int num[] = {10, 20, 30 , 40, 50};
        int i,target = 20, pos = -1;
        for(i=0;i<num.length;i++){
            if(target == num[i]){
                pos = i +1;
            }
            
        }
        if(pos != -1){
            System.out.println("the number is found at" +" "+ pos);
        }
        else{
            System.out.println("The number is not found");
        }
    }
}
