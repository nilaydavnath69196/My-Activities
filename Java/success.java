/*
 NILAY DAV NATH
 DEPERTMENT OF CSE 
 TOPIC - Success input in java
 DATE- 02/28/2025
 */
import java.util.Scanner;
public class success {
    public static void main(String[] args){
        Scanner input = new Scanner(System.in);

        int result;
        System.out.println("Enter your condition(Either Yes FOR 1 or No FOR 0): ");
        result = input.nextInt();
        if(result == 1){
            System.out.println("Congratulations");
        }
        else{
            System.out.println("Call it version 1.0 and prepare foe version 2.0");
 }    
input.close();
}
    
}
