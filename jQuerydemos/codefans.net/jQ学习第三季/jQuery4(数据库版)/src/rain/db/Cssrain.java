package rain.db;



/**
 * Cssrain generated by MyEclipse - Hibernate Tools
 */

public class Cssrain  implements java.io.Serializable {


    // Fields    

     private Integer id;
     private String name;


    // Constructors

    /** default constructor */
    public Cssrain() {
    }

    
    /** full constructor */
    public Cssrain(String name) {
        this.name = name;
    }

   
    // Property accessors

    public Integer getId() {
        return this.id;
    }
    
    public void setId(Integer id) {
        this.id = id;
    }

    public String getName() {
        return this.name;
    }
    
    public void setName(String name) {
        this.name = name;
    }
   








}