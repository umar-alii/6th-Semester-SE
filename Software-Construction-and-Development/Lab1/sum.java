/*
Find the Sum of digits of Number
*/
public class sum{
    public static void main(String[] args){
        int number=4245;
        int sum=0;
        while(number>0){
            int modl=10;
            sum=sum+number%modl;
            number=number/10;
            System.out.println(sum);

        }
        
        System.out.println("The sum of digits of number is: "+sum);
    }
}
