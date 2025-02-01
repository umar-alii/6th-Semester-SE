import java.util.Scanner;

public class task1 {
    public static void main(String[] args) {
        int size;
        Scanner scanner = new Scanner(System.in);
        System.out.println("Enter the size of the array: ");
        size = scanner.nextInt();
        int[] arr = new int[size];

        System.out.println("Array of size " + arr.length + " created");

        for (int i=0; i<=arr.length-1; i++){
            System.out.println("Enter the element at index " + i + ": ");
            arr[i] = scanner.nextInt();
        }

        for(int i=0; i<=arr.length-1; i++){
            System.out.println("Element at index " + i + " is " + arr[i]);
        }
    }
}