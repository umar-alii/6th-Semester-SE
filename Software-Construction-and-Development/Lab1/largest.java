public class largest {
    public static void main(String[] args) {
        int num1 = 10;
        int num2 = 25;
        int num3 = 15;

        int largest;

        if (num1 >= num2 && num1 >= num3)
            largest = num1;
        else if (num2 >= num1 && num2 >= num3)
            largest = num2;
        else
            largest = num3;

        System.out.println("The largest number among " + num1 + ", " + num2 + " and " + num3 + " is: " + largest);
    }
}