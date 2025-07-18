<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace format_massey\output\courseformat;

use format_topics\output\courseformat\content as content_base;
use renderer_base;

/**
 * Class content
 *
 * @package    format_massey
 * @copyright  2025 Andrew Rowatt <A.J.Rowatt@massey.ac.nz>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class content extends content_base {
    /**
     * Export this data so it can be used as the context for a mustache template (core/inplace_editable).
     *
     * @param renderer_base $output typically, the renderer that's calling this function
     * @return stdClass data context for a mustache template
     */
    public function export_for_template(renderer_base $output) {
        $data = parent::export_for_template($output);
        
        $data->sections[0]->header->titlemultipart = "<i>content.phpAJR5:{$data->sections[0]->sectionname}</i>";
        // echo '<pre>content.php:';var_dump($data->sections[0]->header);echo '</pre>';
        // $data->sections[0]->header->title = "<i>AJR5:{$data->sections[0]->header->title}</i>";
        //echo '<pre>content.php:';var_dump($data->sections[0]);echo '</pre>';
        return $data;
        //return parent::export_for_template($output);
    }

    /**
     * Returns the output class template path.
     *
     * This method redirects the default template when the course content is rendered.
     */
    public function get_template_name(\renderer_base $renderer): string {
        return 'format_massey/local/content';
    }
}
