public class reverse {
    public static void main(String[] args) {
        String str = "Hello World";
        String reversed = new StringBuilder(str).reverse().toString();
/*
        for (int i = str.length() - 1; i >= 0; i--) {
            //why we cant do reversed+=str[i]?
            /*we can not do this with above method because 
            in java strings are immutable and we can not change the value of string once it is created
            
            reversed+=str.charAt(i);
        }
*/
        System.out.println("The Original string is: "+str);
        System.out.println("Reversed string: " + reversed);
       
    }
}