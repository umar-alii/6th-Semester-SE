public class smallest {
    public static void main(String[] args) {
        int num1 = 10;
        int num2 = 25;
        int num3 = 15;
        
        int smallest;
      
        if (num1 <= num2 && num1 <= num3)
            smallest = num1;
        else if (num2 <= num1 && num2 <= num3)
            smallest = num2;
        else
            smallest = num3;
     
        System.out.println("The Smallest number among " + num1 + ", " + num2 + " and " + num3 + " is: " + smallest);
    }
}