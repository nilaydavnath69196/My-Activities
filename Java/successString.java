/*
 NILAY DAV NATH
 DEPERTMENT OF CSE 
 TOPIC - SuccessString input in java
 DATE- 02/28/2025
 */
import java.util.Scanner;

public class successString {

    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);

        System.out.println("Enter your condition (Either Yes or No): ");
        String result = input.nextLine(); 

        //  .equalsIgnoreCase() uses is good
        if(result.equalsIgnoreCase("yes"))
         { 
            System.out.println("Congratulations!");
        } else {
            System.out.println("Call it version 1.0 and prepare for version 2.0");
        }

        input.close(); //for close the scanner 
    }
}


