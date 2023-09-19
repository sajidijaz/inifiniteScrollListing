<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_houses_table extends CI_Migration {

	public function up()
	{
		// Define the 'houses' table columns
		$fields = array(
			'id SERIAL PRIMARY KEY',
			'address Text',
			'price DECIMAL(10, 2)',
			'size INT',
			'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
			'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
		);

		// Create the 'houses' table
		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('houses', TRUE);

		// Create a trigger to update 'updated_at' on every update
		$trigger_sql = "
            CREATE OR REPLACE FUNCTION update_updated_at()
            RETURNS TRIGGER AS $$
            BEGIN
                NEW.updated_at = NOW();
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER trigger_update_updated_at
            BEFORE UPDATE ON houses
            FOR EACH ROW
            EXECUTE FUNCTION update_updated_at();
        ";

		$this->db->query($trigger_sql);
	}

	public function down()
	{
		// Drop the 'houses' table
		$this->dbforge->drop_table('houses', TRUE);

		// Drop the trigger
		$this->db->query("DROP TRIGGER IF EXISTS trigger_update_updated_at ON houses;");
		$this->db->query("DROP FUNCTION IF EXISTS update_updated_at();");
	}
}
