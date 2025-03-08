/*
 NILAY DAV NATH
 DEPERTMENT OF CSE 
 TOPIC - INPUT IN JAVA
 DATE- 02/28/2025
 */
import java.util.Scanner;
class input{
public static void main(String[] args) {

    Scanner input = new Scanner(System.in);
    System.out.println("Enter any number: ");
    int number = input.nextInt();
    input.nextLine(); //it should be ussed when we need to take new user input

    System.out.println("You have entered the number is: "+number);

    String name;
    System.out.println("Enter Your Name: ");
    name = input.nextLine();
    System.out.println("Wellcome "+name);
}

}