import java.util.Scanner;

public class task2{
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
        System.out.println("Reversing the Array");

        int left=0; int right=arr.length-1;
        while(left<right){
            int temp=arr[left];
            arr[left]=arr[right];
            arr[right]=temp;
            left++;
            right--;
        }
        for(int i=0; i<=arr.length-1; i++){
            System.out.println("Element at index " + i + " is " + arr[i]);
        
        }
    }
}