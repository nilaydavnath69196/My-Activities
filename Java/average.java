/*
 NILAY DAV NATH
 DEPERTMENT OF CSE 
 TOPIC - user input average
 DATE- 02/28/2025
 */
import java.util.Scanner;

class Average {
    public static void main(String args[]) {
        int num1, num2, num3, num4;
        Scanner input = new Scanner(System.in);

        // Taking inputs
        System.out.println("Enter four numbers: ");
        num1 = input.nextInt();
        num2 = input.nextInt();
        num3 = input.nextInt();
        num4 = input.nextInt();

        // Calculating average
        float average = (num1 + num2 + num3 + num4) / 4.0f;

        // Printing result
        System.out.println("The average is: " + average);

        // Closing Scanner
        input.close();
    }
}
