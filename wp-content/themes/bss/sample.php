<?php get_header(); ?>

<table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>New York</td>
            <td><button>+</button><button>-</button></td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>jane@example.com</td>
            <td>London</td>
            <td><button>+</button><button>-</button></td>
        </tr>
        <tr>
            <td>Michael Brown</td>
            <td>michael@example.com</td>
            <td>Toronto</td>
            <td><button>+</button><button>-</button></td>
        </tr>
        <tr>
            <td><input type="text" placeholder="Name"></td>
            <td><input type="email" placeholder="Email"></td>
            <td><input type="text" placeholder="City"></td>
            <td><button>Save</button></td>
        </tr>
    </table>

<?php get_footer(); ?>