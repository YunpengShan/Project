/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */


/**
 *
 * @author Yunpeng Shan Aug 2022
 */
public class Dealer  {
    Hand hand = new Hand();
    public Dealer() {
        
    }

public boolean isOverSixteen(){
   return hand.getTotalValue()>16;

}


        

}
